<?php if (is_array($comments) && count($comments) > 0) : ?>
<hr>
	<div id="comments" class='comments'>
	<h1><?= count($comments) . " kommentar" . (count($comments)!=1 ? "er" : "") ?></h1>
	<?php foreach ($comments as $index => $comment) : ?>
		<div class="comment">
			<div class="pull-left">
				<img src="http://www.gravatar.com/avatar/<?=md5($comment['mail']);?>.jpg?s=40"  />
			</div>
			<div class="comment-body">
				<div>
					<a href="<?= $this->url->create('comment/edit/' . $this->di->comments->getPageIdentifier() . '/' . $comment['id']) ?>" class="id">#<?=$index?></a>
					<span class="author"><?=htmlentities($comment['name'], null, 'utf-8')?></span>
					<time datetime="<?= date("Y-m-d H:i", $comment['timestamp']); ?>">- <?= $this->comments->getTimeAgo($comment['timestamp']) ?></time>
					<?php if( $comment['web'] ): ?>
							<a href="<?=$comment['web']?>" class="web"><?=$comment['web']?></a>
					<?php endif; ?>
					(<a class="remove-comment" href="<?= $this->url->create('comment/remove/' . $this->di->comments->getPageIdentifier() . '/' . $comment['id']) ?>" title="Radera kommentar">ta bort</a>)
				</div>
				<p><?=$comment['content']?></p>
			</div>	
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
