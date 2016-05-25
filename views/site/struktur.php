<?php
	$this->title = $temp['error_desc']!==''?'Error '.$temp['error_code'].': '.$temp['error_desc']:'List Table';
	$this->params['breadcrumbs'][] = ['label' => 'List Table', 'url' => ['list']];
	$this->params['breadcrumbs'][] = 'Struktur Table';
?>
<div class="page-header" style="margin-top: 0px;" >
	<div class="row">
		<div class="col-md-12">
			<h4>Struktur Table {{<?php echo $table;?>}}</h4>
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
				echo "<table class=\"table table-hover table-striped table-bordered\">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Kolom</th>
									<th>Primary Key</th>
									<th>Tipe</th>
									<th>Not Null</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>";
								$i=0;
								foreach ($temp['result'] as $value) {
									isset($value['pk'])?$pk='PK':$pk='';
									isset($value['not_null'])?$nl='not_null':$nl='null';
									echo "<tr>
												<td>".++$i."</td>
												<td>".$value['column_name']."</td>
												<td>".$pk."</td>
												<td>".$value['type']."</td>
												<td>".$nl."</td>
												<td>".$value['desc']."</td>
										</tr>";
								}
						echo "</tbody>
					</table>";
			}
		?>
	</div>
</div>