@if (session('warning'))
<script type="text/javascript">
    $(function(){
      PNotify.prototype.options.styling = "fontawesome";
      new PNotify({
        title: 'Algo anda mal!',
        text: '{{ session('warning')}}',
        type: 'warning'
      });
    });
</script>
@endif