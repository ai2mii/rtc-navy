
@foreach($positions[$under] as $order => $position)
	<tr>
		<td class="text-center border-top">{{ $order }}</td>
		@foreach($position as $name => $position2)
			<td class="border-top">{{ $name }}</td>
			@foreach($position2 as $corps => $position3)
				@if(count($position2) == 1)
					<td  class="text-center border-top">{{ $corps }}</td>
					@foreach($position3 as $rank => $position4)
						@if(count($position3) == 1)
							<td class="text-center border-top">{{ $rank }}</td>
							<td class="text-center border-top"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'count',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['count'] == 0 ? '' :  $position4['count'] }}</a></td>
							<td class="text-center border-top"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countClose', 'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countClose'] == 0 ? '' :  $position4['countClose'] }}</a></td>
							<td class="text-center border-top"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countOpen',  'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countOpen'] == 0 ? '' :  $position4['countOpen'] }}</a></td>
							<td class="text-center border-top"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'load',       'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['load'] == 0 ? '' :  $position4['load'] }}</td>
							<td class="text-center border-top"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'available',  'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['available'] == 0 ? '' :  $position4['available'] }}</a></td>
						@else
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}">{{ $rank }}</td>
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'count',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['count'] == 0 ? '' :  $position4['count'] }}</a></td>
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countClose',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countClose'] == 0 ? '' :  $position4['countClose'] }}</a></td>
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countOpen',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countOpen'] == 0 ? '' :  $position4['countOpen'] }}</a></td>
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'load',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['load'] == 0 ? '' :  $position4['load'] }}</a></td>
							<td class="text-center {{ reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'available',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['available'] == 0 ? '' :  $position4['available'] }}</a></td>

							@if(end($position3) != $position3[$rank])
								</tr><tr>
								<td></td>
								<td></td>
								<td  class="text-center">{{ $corps }}</td>
							@endif
						@endif
					@endforeach

				@else
					<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}">{{ $corps }}</td>
					@foreach($position3 as $rank => $position4)
						@if(count($position3) == 1)
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}">{{ $rank }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'count',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['count'] == 0 ? '' :  $position4['count'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countClose',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countClose'] == 0 ? '' :  $position4['countClose'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countOpen',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countOpen'] == 0 ? '' :  $position4['countOpen'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'load',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['load'] == 0 ? '' :  $position4['load'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'available',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['available'] == 0 ? '' :  $position4['available'] }}</td>
						@else
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}">{{ $rank }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'count',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['count'] == 0 ? '' :  $position4['count'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countClose',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countClose'] == 0 ? '' :  $position4['countClose'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'countOpen',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['countOpen'] == 0 ? '' :  $position4['countOpen'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'load',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['load'] == 0 ? '' :  $position4['load'] }}</td>
							<td class="text-center {{ reset($position2) == $position2[$corps] && reset($position3) == $position3[$rank] ? 'border-top' : '' }}"><a target="_blank" href="{{ action('ReportPositionController@showDetail', ['listsBy' => 'available',      'order' => $order, 'name' => $position4['name'], 'rank' => $position4['rank'], 'corps' => $position4['corps']]) }}">{{ $position4['available'] == 0 ? '' :  $position4['available'] }}</td>
							@if(end($position3) != $position3[$rank])
								</tr><tr>
								<td></td>
								<td></td>
								<td  class="text-center">{{ $corps }}</td>
							@endif
						@endif
					@endforeach
					@if(end($position2) != $position2[$corps])
						</tr><tr>
						<td></td>
						<td></td>
					@endif

				@endif
			@endforeach
		@endforeach
	</tr>
@endforeach
