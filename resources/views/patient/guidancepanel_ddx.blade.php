<form class="form-horizontal" method="POST" action="{{ route('post_ddx') }}" id="ddx_form">
    {{ csrf_field() }}
    <input id="module_id" name="module_id" type="hidden" value="{{ $patient->module_id }}">
    <input id="patient_id" name="patient_id" type="hidden" value="{{ $patient->patient_id }}">
    <input type=hidden id="user_id" name="user_id" value="{{ Auth::user()->id }}">
    <br>
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr class="bg-info">
    <th>List of Diagnosis</th>
    <!-- <th colspan="2"></th> -->
    </tr>
    </thead>
    <tbody>
    @foreach ($diagnosis_list_ddx as $diagnosis)
        <tr>
        <td><p><?php echo ($diagnosis->value); ?></p></td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        </div>

	<div class="row">
        <div class="col-md-2" style="padding-left: 10px">
        <label for="Diagnosis"> Diagnosis:</label>
        </div>
        <div class="col-md-6">
        <select id="search_diagnosis_ddx" class="js-example-basic-multiple js-states form-control " name="search_diagnosis_ddx[]" multiple></select>
        </div>
        </div>
        <br>

    <div class="row">
    <div class="col-sm-6" style="padding-right: 25px">
        <button type="submit" id="btn_save_ddx" class="btn btn-primary"  style="float: right">
        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save DDx
        </button>
    </div>
</div>
</form>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script>
        $('#search_diagnosis_ddx').select2({
             placeholder: "Choose Diagnosis...",
             minimumInputLength: 2,
             ajax: {
                 url: '{{route('diagnosis_find')}}',
                 dataType: 'json',
                 data: function (params) {
                     return {
                         q: $.trim(params.term),
                     };
                 },
                 processResults: function (data) {
                     return {
                         results: data
                     };
                 },
                 cache: false
             }
         });
        $(document).ready(function(){
            var inputsChanged = false;
            $('#ddx_form').change(function() {
                inputsChanged = true;
            });

            function unloadPage(){
                if(inputsChanged){
                    return "Do you want to leave this page?. Changes you made may not be saved.";
                }
            }

            $("#btn_save_ddx").click(function(){
                inputsChanged = false;
            });
            window.onbeforeunload = unloadPage;
        });

        $('.form-check-input').click( function()
        {
            $('#btn_save_ddx').prop('disabled', false);
        } );
</script>