<?php
	$this->title = $temp['error_desc']!==''?'Error '.$temp['error_code'].': '.$temp['error_desc']:'List Table';
	$this->params['breadcrumbs'][] = ['label' => 'List Table', 'url' => ['list']];
	$this->params['breadcrumbs'][] = 'View Table';
?>
<div class="page-header" style="margin-top: 0px;" >
	<div class="row">
		<div class="col-md-12">
			<h4>View Table {{<?php echo $table;?>}}. Jumlah data: <?php echo $total['result']; ?></h4>
		</div>   
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php
			if ($temp['error_desc']!=='') {
				echo "<div class=\"alert alert-danger\">
						<h4>Error ".$temp['error_code']."</h4>
						<p>".$temp['error_desc']."</p>
					</div>";
			} else {
		?>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<?php
						foreach ($dictionary['result'] as $value) {
							echo "<th>".$value['column_name']."</th>";
						}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					foreach ($temp['result'] as $value) {
						echo "<tr>
								<td>".++$i."</td>";
								foreach ($dictionary['result'] as $dict) {
									if (isset($value[$dict['column_name']])) {
										$temp_isi = $value[$dict['column_name']];
									} else {
										$temp_isi = "";
									}
									echo "<td>".$temp_isi."</td>";
								}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		<?php } ?>
	</div>
</div>