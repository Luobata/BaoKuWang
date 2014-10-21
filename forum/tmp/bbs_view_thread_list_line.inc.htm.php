<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php if(isset($keyword)?$fid||$keyword:$fid) { ?>


 <!--------------------- 替换整个table------------------------------------------------- -->
<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
			

			

			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			
 <!--------------------- --此处将原来的最新帖子替换为板块信息------------------------------------------------- -->                           
                        <a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?>&nbsp;</a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow">&nbsp;&nbsp;<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2">&nbsp;&nbsp;<?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />





<?php } else { ?>
	<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject blank_pic">
			
			<!--添加图片-->
			<img src="http://localhost/forum/view/image/blank_icon.png" class="blank_icon">
			
					
		</td>
		<td class="blan_name">
			<li>
				<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>
				<span class="my_Y">(<span class="my_Y"><?php echo isset($blank["$_fid"]["threads"]) ? $blank["$_fid"]["threads"] : '';?></span>)</span>
			</li>
			<li><span class="my_grey">版主:<span class="my_grey"><?php echo isset($blank["$_fid"]["modnames"]) ? $blank["$_fid"]["modnames"] : '';?></span></span></li>		
		</td>
		
		<td min-width="80" class="username">
			<li>
				<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($_fid) ? $_fid : '';?>-tid-<?php echo isset($blank["$_fid"]["lasttid"]) ? $blank["$_fid"]["lasttid"] : '';?>.htm" style="color:#b38b52"><?php echo isset($blank["$_fid"]["subject"]) ? $blank["$_fid"]["subject"] : '';?></a>
			</li>
			<li>
				<span class="my_grey"><?php echo isset($blank["$_fid"]["date"]) ? $blank["$_fid"]["date"] : '';?> <span class="my_grey"><?php echo isset($blank["$_fid"]["author"]) ? $blank["$_fid"]["author"] : '';?></span></span>
			</li>
		</td>
		<!-- <td width="80" class="lastpost">
			
		</td>
		<td width="80" class="views" align="center">
		</td> -->
		
	</tr>
</table>

<hr />
<?php } ?>



