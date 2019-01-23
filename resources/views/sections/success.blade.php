@if (session('success'))
<script type="text/javascript">
    $(function(){
      PNotify.prototype.options.styling = "fontawesome";
      new PNotify({
        title: 'Éxito!',
        text: '{{ session('success')}}',
        type: 'success'
      });
    });
</script>
@endif