<div id="landing_2">
	<div class="container-960">
		<div class="innerT">

			<div class="row-fluid">
				<div class="span12">
					<!-- Breadcrumb -->
				    <!-- <ol class="breadcrumb breadcrumb-arrow">
						<li><a href="<?=site_url('webmin')?>">Home</a></li>
						<li><a href="#">Website</a></li>
						<li><a href="#">Widget</a></li>
						<li class="active"><span><b>Polling</b></span></li>
					</ol> -->
					<ul class="breadcrumb">
						<li><a href="<?=site_url('webmin')?>"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="#">Master Data</a></li>
						<li><a href="#">Website</a></li>
						<li><a href="#">Widget</a></li>
						<li>Polling</li>
					</ul>
					<!-- //Breadcrumb -->
					<div class="widget widget-heading-simple widget-body-white">
						<div class="widget-head"><h4 class="heading glyphicons list"><i></i>Manajemen Polling</h4></div>
						<div class="widget-body">
							<div class="row-fluid">	
								<div class="span12">

									<?=outp_notification()?>

									<!-- Button -->
									<form name="form-search" id="form-search" method="post" action="<?=site_url('webmin_polling/search')?>">
									<table width="100%">
									<tr>
										<td width="16%"><a href="<?=site_url('webmin_polling/form')?>" class="btn btn-secondary btn-mini" style="padding:3px 15px 3px 15px; margin-bottom:10px"><b>+ TAMBAH DATA</b></a></td>
										<td width="84%" align="right" valign="top">
											<input type="text" name="ses_txt_search" value="<?=@$ses_txt_search?>" placeholder="Pencarian ...">
											<a href="<?=site_url('webmin/location/polling')?>" class="icon-refresh" title="Refresh Pencarian ..."></a>
										</td>
									</tr>
									</table>
									</form>
									<!-- List Data -->
									<table class="table table-bordered table-primary table-striped table-vertical-center checkboxs js-table-sortable">
									<thead>
										<tr>
											<th width="2%" class="center">No</th>
											<th width="5%" class="center">Aksi</th>
											<th width="70%">Judul Polling</th>
											<th width="5%">Jml.Opsi</th>
											<th width="1%" class="center">Aktif</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($list_polling as $row):?>
										<tr>
											<td class="center"><?=$row['no']?></td>											
											<td class="center">
												<a href="<?=site_url("webmin_polling/delete/$p/$o/$row[polling_id]")?>" class="icon-remove-sign icon-href" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')"></a>
												<a href="<?=site_url("webmin_polling/form/$p/$o/$row[polling_id]")?>" class="icon-pencil icon-href" title="Edit"></a>
											</td>
											<td class="left">
												<?=$row['polling_title']?><br>
												<span class="news-em">
												<?=$row['polling_description']?>
												</span>
												<div style="border-top:1px dotted #ccc">
													<a href="<?=site_url('webmin_polling/detail/'.$row["polling_id"])?>">&raquo; Lihat Hasil Polling</a>
												</div>
											</td>											
											<td class="center"><?=$row['polling_count_option']?></td>											
											<td class="center"><?=active_st_img($row['polling_st'])?></td>
										</tr>
										<?php endforeach;?>
										<?php if(count($list_polling) == 0):?>
										<tr>
											<td colspan="4" class="center">Data tidak ditemukan.</td>
										</tr>
										<?php endif;?>
									</tbody>
									</table>

									<?php if(count($list_polling) > 0):?>
									<div class="pagination center">
										<ul>
											<?php if($paging->start_link): ?>
							                    <li><a href="<?=site_url("webmin_polling/index/$paging->c_start_link/$o") ?>">First</a></li>
							                <?php endif; ?>
							                <?php if($paging->prev): ?>
							                    <li><a href="<?=site_url("webmin_polling/index/$paging->prev/$o") ?>">Prev</a></li>
							                <?php endif; ?>

							                <?php for($i = $paging->c_start_link; $i <= $paging->c_end_link; $i++): ?>
							                	<li <?php jecho($p, $i, "class='active'") ?>><a href="<?=site_url("webmin_polling/index/$i/$o") ?>"><?=$i ?></a></li>
							                <?php endfor; ?>

							                <?php if($paging->next): ?>
							                    <li><a href="<?=site_url("webmin_polling/index/$paging->next/$o") ?>">Next</a></li>
							                <?php endif; ?>
							                <?php if($paging->end_link): ?>
							                    <li><a href="<?=site_url("webmin_polling/index/$paging->c_end_link/$o") ?>">Last</a></li>
							                <?php endif; ?>
										</ul>
									</div>
									<?php endif;?>

								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
			<div class="separator bottom"></div>
		
		</div>
	</div>	
</div>