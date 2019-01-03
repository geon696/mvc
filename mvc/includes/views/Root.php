<?php $root = new Root; ?>
<div id="outerContainer">
    <div id="container">
        <div class="content">
            <article class="mainArticle">
                
                <div class="story">
                <?php 
                    echo $root->getFirstStory();
                ?>
                </div>
            </article>
        </div>
    </div>
    <div id="botContainer">
        <h2>Other random stories</h2>
        <?php echo $root->otherStories(); ?>
    </div>
</div>
