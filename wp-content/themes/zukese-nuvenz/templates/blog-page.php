<?php
/* Template Name: Blog */
?>

<?php get_header(); ?>

<main class="blog" id="main">


	<section class="section mt-5">
		<div style="background-color: #171B42">
			<div class="container pt-5 pb-5">

				<?php
				$categories = get_categories(
					array(
						'orderby' => 'name',
						'order'   => 'ASC',
					)
				);

				?>

				<form action="/blog" method="get" class="row text-center">

					<div class="col-5">

						<input type="text" name="s" id="txt_search_name" class="form-control"  placeholder="Busca por palavra-chave" value="<?php the_search_query(); ?>" />

					</div>

					<div class="col-5">

						<select id="dd_search_category" name="category" class="custom-select">
                        <option value="">Categorias</option>
							<?php foreach ( $categories as $category ) : ?>
								<option value="<?php echo $category->slug; ?>">
									<?php echo $category->name; ?>
								</option>
							<?php endforeach; ?>
						</select>

					</div>

					<div class="col-2">

						<input type="submit" id="searchsubmit" class="header__button" value="Buscar" />

					</div>

				</form>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="row justify-content-center">

					<div class="content">
						<div id="data_json_blogs"></div>
                        <input type="hidden" id="pagination_counter" value="6"/>
					</div>
				
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
			<a href="#" id="load_more_button" class="header__button">Carregar Mais</a>
			</div>
		</div>
	</section>    

</main>

<?php
add_callable_filter_func();
?>


<?php get_footer(); ?>
