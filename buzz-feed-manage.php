<?php
/*  Copyright 2009  Toivo Lainevool  (email : tlainevool@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if ($_POST['submit-type'] == 'buzz-feed'){
    //UPDATE balues
    update_option('buzz-feed-username', $_POST['buzz-feed-username']);
    update_option('buzz-feed-title-limit', $_POST['buzz-feed-title-limit']);
    update_option('buzz-feed-description-limit', $_POST['buzz-feed-description-limit']);
    update_option('buzz-feed-item-limit', $_POST['buzz-feed-item-limit']);
    update_option('buzz-feed-date-format', $_POST['buzz-feed-date-format']);

    echo '<div id="message" class="updated fade"><p>Options updated.</p></div>';
}


?>

<div class="wrap">
	<h2>Buzz Feed Options</h2>

	<form method="post" >
	<div>
		<p>
		<label for="buzz-feed-username">Your GMail/Buzz user name</label><br/>
		<input type="text" size="100" name="buzz-feed-username" value="<?php echo(get_option('buzz-feed-username')) ?>" />
		</p>

        <p>
		<label for="buzz-feed-item-limit">The number of items to display from the Buzz feed:</label><br/>
        <?php
          $item_limit = get_option('buzz-feed-item-limit');
          if( $item_limit == '' ) {
              $item_limit = 5;
          }
        ?>
		<input type="text" size="3" name="buzz-feed-item-limit" value="<?php echo($item_limit) ?>" />
		</p>

        <p>
		<label for="buzz-feed-description-limit">The number of character to take frm the Buzz post for the link text:</label><br/>
        <?php
          $description_limit = get_option('buzz-feed-description-limit');
          if( $description_limit == '' ) {
              $description_limit = 30;
          }
        ?>
		<input type="text" size="4" name="buzz-feed-description-limit" value="<?php echo($description_limit) ?>" />
		</p>

        <p>
		<label for="buzz-feed-title-limit">The number of character to take frm the Buzz post for the title attribte:</label><br/>
        <?php
          $title_limit = get_option('buzz-feed-title-limit');
          if( $title_limit == '' ) {
              $title_limit = 100;
          }
        ?>
		<input type="text" size="4" name="buzz-feed-title-limit" value="<?php echo($title_limit) ?>" />
		</p>

        <p>
		<label for="buzz-feed-date-format">The number of character to take frm the Buzz post for the title attribte:</label><br/>
        <?php
          $date_format = get_option('buzz-feed-date-format');
          if( $date_format == '' ) {
              $date_format = 'j F Y | g:i a';
          }
        ?>
		<input type="text" size="20" name="buzz-feed-date-format" value="<?php echo($date_format) ?>" />
		</p>

    <input type="hidden" name="submit-type" value="buzz-feed">
	</div>
		<p><input type="submit" name="submit" value="Save Options" /></p>
	</form>

</div>
