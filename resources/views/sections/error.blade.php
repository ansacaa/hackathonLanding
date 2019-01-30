@if (session('error'))
<script type="text/javascript">
    $(function(){
      PNotify.prototype.options.styling = "fontawesome";
      new PNotify({
        title: 'Algo anda mal!',
        text: '{{ session('error')}}',
        type: 'danger'
      });
    });
</script>
@endif