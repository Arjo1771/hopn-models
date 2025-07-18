<h2>📩 New Booking Received</h2>

<p><strong>Model:</strong> {{ $booking->modelProfile->name }}</p>
<p><strong>Client Name:</strong> {{ $booking->client_name }}</p>
<p><strong>Date:</strong> {{ $booking->date }}</p>
<p><strong>Duration:</strong> {{ $booking->duration }}</p>
@if ($booking->notes)
<p><strong>Notes:</strong> {{ $booking->notes }}</p>
@endif
