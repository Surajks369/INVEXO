<!-- Add this to the table headers in the index view -->
<th>Buy %</th>
<th>Hold %</th>
<th>Sell %</th>

<!-- Add this inside the table row loop -->
<td>{{ number_format($report->buy_percentage, 2) }}%</td>
<td>{{ number_format($report->hold_percentage, 2) }}%</td>
<td>{{ number_format($report->sell_percentage, 2) }}%</td>