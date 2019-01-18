@if (session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-datatables"><button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button><strong>{!! session()->get('flash_notification.title') !!}</strong>&nbsp;&nbsp;&nbsp;{!! session()->get('flash_notification.message') !!}</div>
@endif
