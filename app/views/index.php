<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>welcome</h1>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>最近登录人</th>
							<th>最近登录时间</th>
							<th>最近登录IP</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($userData as $key => $user): ?>
						<tr>
							<td><?=$user['id']?></td>
							<td><?=$user['name']?></td>
							<td>
							<?php if (!empty($user['login_time'])): ?>
								<?=get_date($user['login_time'])?>
							<?php endif ?>
							</td>
							<td><?=$user['ip']?></td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div> <!-- end table -->
		</div>
	</div>
<?php view('footer'); ?>
