 <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
						<?= 
							$philosophy_cmt_number = get_comments_number();
							if($philosophy_cmt_number <= 1){
								echo $philosophy_cmt_number." ".__('comment','philosophy');
							}else{
								echo $philosophy_cmt_number." ".__('comments','philosophy');
							}
						?>
					</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">
						<?php wp_list_comments(); ?>
                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2"><?php _e('Add Comment','philosophy');?></h3>

                        <?php
							comment_form();
						?>

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->