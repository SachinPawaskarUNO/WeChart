
<br>    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="bg-info">
                    <th>List of Medications</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($medications as $medicine)
                    <tr>
                        <td><p>{{$medicine->value}}</p></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="bg-info">
                            <th>List of Ordered Labs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($labs as $lab)
                        <tr>
                            <td><p>{{$lab->value}}</p></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="bg-info">
                            <th>List of Ordered Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                        <tr>
                            <td><p>{{$image->value}}</p></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="bg-info">
                            <th>List of Ordered Procedures</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procedures as $procedure)
                        <tr>
                          	<td><p>{{$procedure->value}}</p></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
