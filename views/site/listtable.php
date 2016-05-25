<?php
	use yii\helpers\Url;

	$this->title = $temp['error_desc']!==''?'Error '.$temp['error_code'].': '.$temp['error_desc']:'List Table';
	$this->params['breadcrumbs'][] = 'List Table';
?>
<div class="page-header" style="margin-top: 0px;" >
	<div class="row">
		<div class="col-md-12">
			<h4>List Tabel</h4>
		</div>   
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</td>
					<th width="20%">Nama Table</th>
					<th width="10%">Jenis</th>
					<th>Keterangan</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ($temp['error_desc']!=='') {
						echo "<tr><td colspan=\"5\" align=\"center\">Error ".$temp['error_code'].": ".$temp['error_desc']."</td></tr>";
					} else {
						$i=0;
						foreach ($temp['result'] as $row) {
							echo "<tr>
									<td>".++$i."</td>
									<td>".$row['table']."</td>
									<td>".$row['jenis']."</td>
									<td>".$row['keterangan']."</td>
									<td>
										<!--a href=\"javascript:void();\" class=\"modalButton\" data-toggle=\"modal\" data-src=\"".Url::to(['site/struktur/'.$row['table']])."\" data-target=\"#modalku\"-->
										<a href=\"".Url::to(['site/struktur?table='.$row['table']])."\">
											<span class=\"glyphicon glyphicon-tasks\" aria-hidden=\"true\"></span> Struktur 
										</a> |  
										<!--a href=\"javascript:void();\" class=\"modalButton\" data-toggle=\"modal\" data-src=\"".Url::to(['site/view/'.$row['table']])."\" data-height=\"300\" data-width=\"560\" data-target=\"#modalku\"-->
										<a href=\"".Url::to(['site/view?table='.$row['table']])."\">
											<span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span> View Data
										</a>
									</td>
								</tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>
