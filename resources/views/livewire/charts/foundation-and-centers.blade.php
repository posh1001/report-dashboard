<div wire:poll.{{ $pollInterval }}s="loadData" class="max-w-7xl mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @php
            $padding = 40;
            $chartHeight = 120;
            $pointSpacing = 60;
            $straightLine = $straightLine ?? false;

            function generateChartPath($data, $chartWidth, $chartHeight, $padding, $straightLine = false)
            {
                $count = max(count($data), 1);
                $max = max($data ?: [1]);
                $points = [];

                if ($count > 1) {
                    foreach ($data as $i => $value) {
                        $x = $padding + ($i / ($count - 1)) * $chartWidth;
                        $y = $chartHeight - ($value / $max) * $chartHeight + 10;
                        $points[] = [$x, $y];
                    }
                } else {
                    $x = $padding + $chartWidth / 2;
                    $y = $chartHeight - (($data[0] ?? 1) / $max) * $chartHeight + 10;
                    $points[] = [$x, $y];
                }

                if ($straightLine) {
                    $path = "M{$points[0][0]},{$points[0][1]}";
                    for ($i = 1; $i < $count; $i++) {
                        $path .= " L{$points[$i][0]},{$points[$i][1]}";
                    }
                } else {
                    $path = "M{$points[0][0]},{$points[0][1]}";
                    for ($i = 1; $i < $count; $i++) {
                        $cx = ($points[$i - 1][0] + $points[$i][0]) / 2;
                        $cy = ($points[$i - 1][1] + $points[$i][1]) / 2;
                        $path .= " Q{$points[$i - 1][0]},{$points[$i - 1][1]} {$cx},{$cy}";
                    }
                    if ($count > 1) $path .= " T{$points[$count - 1][0]},{$points[$count - 1][1]}";
                }

                $fillPath = $path . " L{$points[$count - 1][0]}," . ($chartHeight + 10) . " L{$points[0][0]}," . ($chartHeight + 10) . " Z";

                return [$points, $path, $fillPath, $max];
            }

            $charts = [
                'Foundation School Enrollment' => ['data' => $foundation, 'color' => '#4f46e5', 'gradientId' => 'gradFoundation'],
                'Service Centers' => ['data' => $serviceCenters, 'color' => '#db2777', 'gradientId' => 'gradService']
            ];
        @endphp

        @foreach($charts as $title => $chart)
            @php
                $count = max(count($chart['data']), 1);
                $chartWidth = max(($count - 1) * $pointSpacing, 300);
                [$points, $path, $fillPath, $max] = generateChartPath($chart['data'], $chartWidth, $chartHeight, $padding, $straightLine);

                // Calculate extra top space for numbers
                $maxValueY = min(array_column($points, 1));
                $topPadding = max(20, 12); // extra space above highest point
                $svgHeight = $chartHeight + $topPadding + 30;

                $minSpacing = PHP_INT_MAX;
                for ($i = 1; $i < count($points); $i++) {
                    $spacing = $points[$i][0] - $points[$i-1][0];
                    if ($spacing < $minSpacing) $minSpacing = $spacing;
                }
                $fontSize = min(10, max(6, $minSpacing * 0.15));
            @endphp

            <div class="bg-white rounded-2xl shadow-xl p-6 h-80 flex flex-col overflow-x-auto">
                <h2 class="text-lg font-semibold mb-4" style="color: {{ $chart['color'] }}">{{ $title }}</h2>

                <div class="flex-1 min-w-full">
                    <svg viewBox="0 0 {{ $chartWidth + $padding*2 }} {{ $svgHeight }}" class="w-full h-full">
                        <!-- Gradient -->
                        <defs>
                            <linearGradient id="{{ $chart['gradientId'] }}" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="{{ $chart['color'] }}" stop-opacity="0.4"/>
                                <stop offset="100%" stop-color="{{ $chart['color'] }}" stop-opacity="0"/>
                            </linearGradient>
                        </defs>

                        <!-- Y-axis & grid -->
                        <line x1="{{ $padding }}" y1="{{ $topPadding }}" x2="{{ $padding }}" y2="{{ $chartHeight+10 }}" stroke="#6b7280"/>
                        @for($i=0;$i<=5;$i++)
                            @php
                                $yVal = ($i/5)*$max;
                                $yPos = $chartHeight - ($yVal/$max)*$chartHeight + 10;
                            @endphp
                            <line x1="{{ $padding }}" y1="{{ $yPos }}" x2="{{ $chartWidth+$padding }}" y2="{{ $yPos }}" stroke="rgba(203,213,225,0.3)" stroke-dasharray="5,5"/>
                            <text x="{{ $padding-10 }}" y="{{ $yPos+4 }}" font-size="10" fill="#6b7280" text-anchor="end">{{ round($yVal) }}</text>
                        @endfor

                        <!-- X-axis -->
                        <line x1="{{ $padding }}" y1="{{ $chartHeight+10 }}" x2="{{ $chartWidth+$padding }}" y2="{{ $chartHeight+10 }}" stroke="#6b7280"/>
                        @foreach($groups as $i=>$group)
                            @php
                                $xPos = ($count>1) ? $padding + ($i/($count-1))*$chartWidth : $padding + $chartWidth/2;
                            @endphp
                            <text x="{{ $xPos }}" y="{{ $chartHeight+28 }}" font-size="10" fill="#6b7280" text-anchor="middle">{{ $group }}</text>
                        @endforeach

                        <!-- Gradient fill -->
                        <path d="{{ $fillPath }}" fill="url(#{{ $chart['gradientId'] }})" stroke="none"/>

                        <!-- Line path animation -->
                        <path d="{{ $path }}" fill="none" stroke="{{ $chart['color'] }}" stroke-width="3"
                              stroke-dasharray="{{ strlen($path)*2 }}" stroke-dashoffset="{{ strlen($path)*2 }}">
                            <animate attributeName="stroke-dashoffset" from="{{ strlen($path)*2 }}" to="0" dur="0.8s" fill="freeze" />
                        </path>

                        <!-- Data numbers animation -->
                        @foreach($points as $i=>$p)
                            @php
                                $yNumber = $p[1] - 12;
                                $yNumber = max($yNumber, $topPadding); // ensure number visible
                                $yNumber = min($yNumber, $chartHeight + 5);
                            @endphp
                            <!-- Outline -->
                            <text x="{{ $p[0] }}" y="{{ $yNumber }}" font-size="{{ $fontSize }}" stroke="#ffffff" stroke-width="3" paint-order="stroke" text-anchor="middle" font-weight="semi-bold" opacity="0">
                                {{ $chart['data'][$i] }}
                                <animate attributeName="opacity" from="0" to="1" dur="0.8s" fill="freeze" />
                                <animateTransform attributeName="transform" type="translate" from="0,5" to="0,0" dur="0.8s" fill="freeze" />
                            </text>
                            <!-- Foreground -->
                            <text x="{{ $p[0] }}" y="{{ $yNumber }}" font-size="{{ $fontSize }}" fill="{{ $chart['color'] }}" text-anchor="middle" font-weight="bold" opacity="0">
                                {{ $chart['data'][$i] }}
                                <animate attributeName="opacity" from="0" to="1" dur="0.8s" fill="freeze" />
                                <animateTransform attributeName="transform" type="translate" from="0,5" to="0,0" dur="0.8s" fill="freeze" />
                            </text>
                        @endforeach
                    </svg>
                </div>
            </div>
        @endforeach

    </div>
</div>
