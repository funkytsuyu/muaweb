<?php // template name: wedding page ?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="wedding-banner" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
</div>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
  <div class="flex-row">
    <div class="flex-1">
      <blockquote>
      Your big day is coming and you want to look your best. Your wedding is special and will be treated as such.
      </blockquote>
      <h2>
      The Process
      </h2>
      <p>
      Many questions will be asked to fit the unique feel and theme of your wedding, such as:
      </p>
      <p>+ During which season is your wedding?
      + Does your wedding have a specific theme and/or color scheme?
      + What color is your dress and jewelry(ies)?
      </p>
    </div>
    <div class="flex-1">
      <h2>The packages</h2>
      <div class="package">
      <div class="title">
      Regular Package
      </div>
      - The makeup trial, of a maximal duration of 2 hours. (For a more faithful result, the makeup should be tried with the wedding hairdo. Both trials should therefore be on the same day.);
      - Makeup on wedding day.
      </div>
      <div class="package">
      <div class="title">
      Deluxe Package
      </div>
      - An online appointement with the makeup artist: MUA compiles bride’s needs, desires & ideas;
      - Creation of an inspiration board on Pinterest, shared with the bride;
      - The makeup trial, of a maximal duration of 3 hours. (For a more faithful result, the makeup should be tried with the wedding hairdo. Both trials should therefore be on the same day.);
      - Makeup on wedding day.
      - Also includes a lipsticks or lipgloss and false lashes.
    </div>
  </div>
  </section>
</article>
</section>
<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
