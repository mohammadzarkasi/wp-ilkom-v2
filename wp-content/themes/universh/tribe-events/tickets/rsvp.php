<?php
/**
 * This template renders the RSVP ticket form
 *
 * @version 4.2
 *
 * @var bool $must_login
 */

$is_there_any_product         = false;
$is_there_any_product_to_sell = false;

ob_start();
$messages = Tribe__Tickets__RSVP::get_instance()->get_messages();
$messages_class = $messages ? 'tribe-rsvp-message-display' : '';
$now = current_time( 'timestamp' );
?>
<form action="" class="cart <?php echo esc_attr( $messages_class ); ?>" method="post" enctype='multipart/form-data'>
	<div class="tribe-rsvp-messages">
		<?php
		if ( $messages ) {
			foreach ( $messages as $message ) {
				?>
				<div class="tribe-rsvp-message tribe-rsvp-message-<?php echo esc_attr( $message->type ); ?>">
					<?php echo esc_html( $message->message ); ?>
				</div>
				<?php
			}//end foreach
		}//end if
		?>
		<div class="tribe-rsvp-message tribe-rsvp-message-error tribe-rsvp-message-confirmation-error" style="display:none;">
			<?php echo esc_html_e( 'Please fill in the RSVP confirmation name and email fields.', 'universh' ); ?>
		</div>
	</div>
	<table width="100%" class="tribe-events-tickets tribe-events-tickets-rsvp">
		<?php
		foreach ( $tickets as $ticket ) {
			// if the ticket isn't an RSVP ticket, then let's skip it
			if ( 'Tribe__Tickets__RSVP' !== $ticket->provider_class ) {
				continue;
			}

			if ( $ticket->date_in_range( $now ) ) {
				$is_there_any_product = true;
				?>
				<tr>
					<td class="tribe-ticket quantity" data-product-id="<?php echo esc_attr( $ticket->ID ); ?>">
						<input type="hidden" name="product_id[]" value="<?php echo absint( $ticket->ID ); ?>">
						<?php
						if ( $ticket->is_in_stock() ) {
							$is_there_any_product_to_sell = true;
							?>
							<input type="number" class="tribe-ticket-quantity form-control" min="0" max="<?php echo esc_attr( $ticket->remaining() ); ?>" name="quantity_<?php echo absint( $ticket->ID ); ?>" value="0" <?php disabled( $must_login ); ?> >
							<?php

							if ( $ticket->managing_stock() ) {
								?>								
					</td>
                    <div class="col-sm-6">
                        <!-- Count -->                        
                        <div class="count-block">
                            <h5><?php echo esc_html__('Available Tickets', 'universh'); ?></h5>
                            <h3 class="count-number" data-count="<?php echo esc_html($ticket->remaining()); ?>"><span class="counter"></span></h3>
                        </div><!-- Count -->
                    </div>
                    <div class="col-sm-6">
                        <!-- Count -->
                        <div class="count-block">
                            <h5><?php echo esc_html__('Total Members', 'universh'); ?></h5>
                            <h3 class="count-number" data-count="<?php echo esc_html($ticket->original_stock()); ?>"><span class="counter"></span></h3>
                        </div><!-- Count -->
                    </div><!-- Column -->
                    <?php
							}
						}//end if
						else {
							?>
							<span class="tickets_nostock"><?php esc_html_e( 'Out of stock!', 'universh' ); ?></span>
							<?php
						}
						?>
					
				</tr>
				<?php

				/**
				 * Allows injection of HTML after an RSVP ticket table row
				 *
				 * @var Event ID
				 * @var Tribe__Tickets__Ticket_Object
				 */
				do_action( 'event_tickets_rsvp_after_ticket_row', tribe_events_get_ticket_event( $ticket->id ), $ticket );

			}
		}//end foreach

		if ( $is_there_any_product_to_sell ) {
			?>
			<tr class="tribe-tickets-meta-row">
				<td colspan="4" class="tribe-tickets-attendees">
					<header><?php esc_html_e( 'Send RSVP confirmation to:', 'universh' ); ?></header>
					<?php
					/**
					 * Allows injection of HTML before RSVP ticket confirmation fields
					 *
					 * @var array of Tribe__Tickets__Ticket_Object
					 */
					do_action( 'event_tickets_rsvp_before_confirmation_fields', $tickets );
					?>
					<table class="tribe-tickets-table">
						<tr class="tribe-tickets-full-name-row">
							<td>
								<label for="tribe-tickets-full-name"><?php esc_html_e( 'Full Name', 'universh' ); ?>:</label>
							</td>
							<td colspan="3">
								<input type="text" name="attendee[full_name]" id="tribe-tickets-full-name" class="form-control">
							</td>
						</tr>
						<tr class="tribe-tickets-email-row">
							<td>
								<label for="tribe-tickets-email"><?php esc_html_e( 'Email', 'universh' ); ?>:</label>
							</td>
							<td colspan="3">
								<input type="email" name="attendee[email]" id="tribe-tickets-email" class="form-control">
							</td>
						</tr>

						<tr class="tribe-tickets-order_status-row">
							<td>
								<label for="tribe-tickets-order_status"><?php esc_html_e( 'RSVP', 'universh' ); ?>:</label>
							</td>
							<td colspan="3">
								<?php Tribe__Tickets__Tickets_View::instance()->render_rsvp_selector( 'attendee[order_status]', '' ); ?>
							</td>
						</tr>

						<?php if ( class_exists( 'Tribe__Tickets_Plus__Attendees_List' ) && ! Tribe__Tickets_Plus__Attendees_List::is_hidden_on( get_the_ID() ) ) : ?>
							<tr class="tribe-tickets-attendees-list-optout">
								<td colspan="4">
									<input type="checkbox" name="attendee[optout]" id="tribe-tickets-attendees-list-optout">
									<label for="tribe-tickets-attendees-list-optout"><?php esc_html_e( 'Don\'t list me on the public attendee list', 'universh' ); ?></label>
								</td>
							</tr>
						<?php endif; ?>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="add-to-cart">
					<?php if ( $must_login ): ?>
						<?php $login_url = Tribe__Tickets__Tickets::get_login_url() ?>
						<a href="<?php echo esc_url($login_url); ?>"><?php esc_html_e( 'Login to RSVP', 'universh' );?></a>
					<?php else: ?>
						<button type="submit" name="tickets_process" value="1" class="btn"><?php esc_html_e( 'Confirm RSVP', 'universh' );?></button>
					<?php endif; ?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</form>

<?php
$content = ob_get_clean();
if ( $is_there_any_product ) {
	echo esc_html($content);
} else {
	$unavailability_message = $this->get_tickets_unavailable_message( $tickets );

	// if there isn't an unavailability message, bail
	if ( ! $unavailability_message ) {
		return;
	}

	?>
	<div class="tickets-unavailable">
		<?php echo esc_html( $unavailability_message ); ?>
	</div>
	<?php
}
