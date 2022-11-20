<?php
include '../config.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql = "SELECT * FROM task where user = '".$_SESSION['id']."' AND is_completed = 'no' order by id desc";
$result = mysqli_query($connect,$sql);
?>
<div class="content-wrapper">
     <div class="card">
          <div class="card-body">
            <h3 class="text-center m-4">Pending List</h3>
            <div class="mt-5 mb-5">
            <table class="table table-striped" id="task_table">
			<thead>
				<tr>
					<th>S.No.</th>
					<th>Task</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
                    $no = 1;
                 if(mysqli_num_rows($result)>0){
					while($data = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $data['task_name']?></td>
					<td>
                        <button class="btn btn-success btn-sm" id="complete" onclick="complete(<?= $data['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="fa fa-check-square"></i></button> 
                        <button class="btn btn-danger btn-sm" id="delete" onclick="remove(<?= $data['id'] ?>)"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete the task"></i></button>
					</td>
				</tr>
				<?php
					}
                 }else{
                    echo '<td colspan="3" class="text-center"> No records </td>';
                 }
				?>
			</tbody>
		</table>
            </div>

          </div>
     </div>
 </div>
 
<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>