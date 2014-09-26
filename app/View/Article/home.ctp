<!-- This is view -->
<script>
$(function () {
    $("#slider").excoloSlider();
});
</script>
<?php
echo $this->Html->css('show_article');
echo $this->Html->css('location_image');
echo $this->Html->css('jquery.excoloSlider');
echo $this->Html->script('location_image');
echo $this->Html->script('jquery.excoloSlider.min');
?>
<br/>
<div id="container">

<?php
echo $this->Html->css('slide_show');
echo $this->Html->css('home');
echo $this->Html->css('search_field');
echo $this->Html->script('slide_show');
?>
<div id="search">
	<div id="search_container">
	<!-- 検索  -->
	<br/>
	<?php
	echo $this->Form->create('Article',array(
		'type' => 'post',
		'url' => array('controller' => 'Article','action' => 'Search'),
	));
	?>

	  <input class="search_bar" 
	         name="data[Article][search]" 
	         type="search"
	          placeholder="アニメの名前で検索してください" 
	        >

	<?php	
		
	echo $this->Form->input('Search',array('type' => 'submit','label' => false,'id' => 'search_button'));
	echo $this->Form->end();
	?>
	</div>
</div>

<div id="slide_line">Popular Article <span id="jp">人気日記</span></div>
<div id="slider">
	<?php
		for($i=0;$i<2;$i++)
		{
			for($l=0;$l<$ArticleContentImageCount;$l++)
			{	
				if($ArticleContentImageData[$l]['ArticleContentImage']['article_id'] == $Ranking[$i])
				{
					$ImageName = $ArticleContentImageData[$l]['ArticleContentImage']['image_name'];					
					echo $this->Html->link(
							$this->Html->image($ImageName,array(
							'class' => 'slide')),
							array('controller'=>'Article','action'=>'ShowArticle',$Ranking[$i]),
							array('escape'=>false)
					);

				}

			}//end for loop by l<2
		}//end for loop by ArticleImageCount
	?>
</div><!-- end div slider --> 

<div id="article_line">New Article <span id="jp">最新日記</span></div>
<!-- Show Article -->

<div id="article_container">

<?php
for($i=$ArticleCount-1;$i>=1;$i--)
{
?>
<div id="article_content">

	<div id="article_content_bg">
		<!-- article image -->
		<div id="article_image_content">	
		<?php
			echo $this->Html->image($ArticleData[$i]['Article']['article_image_name'],array(
				'id' => 'article_image'
			));
		?>
		
		<br/>
		</div>
		<!--end article_image_content -->

	</div>
	<!-- end div article_content_bg  -->
	
	<!-- article topic -->
	<div id="article_topic">

	<?php
		echo $this->Html->link($ArticleData[$i]['Article']['article_title'],array(
			'controller' => 'Article',
			'action' => 'ShowArticle',$ArticleData[$i]['Article']['id']
		));
	?>
	</div>
	
	<!-- Anime Name -->
	<div id="article_anime">
	<?php 	
		for($l=0;$l<$AnimeCount;$l++)
		{	
			if($ArticleData[$i]['Article']['anime_id']==$AnimeData[$l]['Anime']['anime_id'])
			{	
				echo $AnimeData[$l]['Anime']['anime_title'];
			}	
		}
		echo "<br/>";
	?>
	</div>

	<!-- Article Date -->
	<div id="article_date">
		<?php
			echo $ArticleData[$i]['Article']['article_date'];
		?>
	</div>
		
	<!-- Comment Amount -->
	<?php
		$Count=0;
		for($k=0;$k<$CommentCount;$k++)
		{
			if($ArticleData[$i]['Article']['id']==$CommentData[$k]['Comment']['article_id'])
			{
				$Count++;
			}
			
		}//end loop			
	?>		
	<div id="comment_amount_line">
		<div id="comment_amount"><?php echo $Count; ?> Comment</span>
		</div>
	</div>

<div id="article_border"></div>	
	
</div>
<!-- end div article content -->	
<?php 	
}//end for 
?>
</div>
<!--end div article containter  -->
	
</div>
<!-- end div container -->
<?php
//test search article by comment amount
//$CommentAmount = array_count_values($CommentData['Comment']['article_id']);

?>











