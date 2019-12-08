 @if ( count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>開始時刻</th>
                    <th>終了時刻</th>
                    <th>場所</th>
                    <th>タスク</th>
                </tr>
            </thead>
               
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->title, ['title' => $task->id]) !!}</td>
                    <td>{{ $task->start_date }} {{ $task->start_time }}</td>
                    <td>{{ $task->end_date }} {{ $task->end_time }}</td>
                    <td>{{ $task->place }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        
     {!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-primary']) !!}
     
      <div id='calendar-view'></div>

<script>
  var calendar = $("#calendar-view").fullCalendar({
  //ヘッダーの設定
  header: {
    left: "today month,basicWeek",
    center: "title",
    right: "prev next"
  },
  editable: true, // イベントを編集するか
  allDaySlot: false, // 終日表示の枠を表示するか
  eventDurationEditable: false, // イベント期間をドラッグしで変更するかどうか
  slotEventOverlap: false, // イベントを重ねて表示するか
  selectable: true,
  selectHelper: true,
  select: function(start, end, allDay) {
    日の枠内を選択したときの処理;
  },
  eventClick: function(calEvent, jsEvent, view) {
    イベントをクリックしたときの処理;
    alare('suda');
  },
  droppable: true, // イベントをドラッグできるかどうか
  events:[
     @foreach($tasks as $task)
      {
      title:"{{ $task->title }}",
      start:"{{ $task->start_date }}",
      end:"{{ $task->end_date }}",
  },
  @endforeach
  ]
    });
  
</script>
