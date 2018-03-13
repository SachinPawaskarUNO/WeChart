
<table  id="image_table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr class="panel-heading" style="background-color: lightblue;font-size: medium">
        <th><i aria-hidden="true"></i> Name</th>
        <th><i aria-hidden="true"></i> Link  </th>
        <th> </th>

    </tr>
    </thead>
    <tbody>
    @foreach ($images as $image)
        <tr id="edittest">
            <td id="edittest1"><?php echo($image->image_lookup_value_tag); ?> </td>
            <td id="edittest2"><?php echo($image->image_lookup_value_link); ?></td>
            <!--  <td style="text-align: right" >
                  <a href="#" class="edit btn enable" id="edit">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                  </a>
              </td> -->
            <td style="text-align: right">
                <a href="{{ route('delete_image', ['id' => $image->image_lookup_value_id]) }}" class="btn btn-danger enable" id="delete">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $images->links() }}