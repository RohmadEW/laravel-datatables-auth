@if(!isset($action))
{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline', 'onsubmit' => "confirm('Apakah Anda yakin menghapus data ini?')"] ) !!}
<a href="{{ $edit_url }}" class="btn btn-xs btn-info table-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ubah">Ubah</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger table-tooltip',"data-toggle"=>"tooltip", "data-placement"=>"bottom","title"=>"Hapus"]) !!}
{!! Form::close()!!}
@elseif(isset($action))
@if(is_array($action))
@foreach($action as $button)
@if($button == 'edit')
<a href="{{ $edit_url }}" class="btn btn-xs btn-info table-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ubah">Ubah</a>
@elseif($button == 'delete')
{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline', 'onsubmit' => "confirm('Apakah Anda yakin menghapus data ini?')"] ) !!}
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}
@else
<a href="{{ $button['link'] }}" class="btn btn-xs table-tooltip btn-{{ $button['class'] }}" data-toggle="tooltip" data-placement="bottom" title="{{ $button['tooltip'] }}">{{ $button['text'] }}</a>
@endif
@endforeach
@else
@if($action == 'edit')
<a href="{{ $edit_url }}" class="btn btn-xs btn-info table-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ubah">Ubah</a>
@endif
@if($action == 'delete')
{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline', 'onsubmit' => "confirm('Apakah Anda yakin menghapus data ini?')"] ) !!}
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger table-tooltip',"data-toggle"=>"tooltip", "data-placement"=>"bottom","title"=>"Hapus"]) !!}
{!! Form::close()!!}
@endif
@if($action == 'custom')
@foreach($buttons as $button)
<a href="{{ $button['link'] }}" class="btn btn-xs table-tooltip btn-{{ $button['class'] }}" data-toggle="tooltip" data-placement="bottom" title="{{ $button['tooltip'] }}">{{ $button['text'] }}</a>
@endforeach
@endif
@endif
@endif