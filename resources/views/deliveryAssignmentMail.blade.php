<h3>Delivery Assignment</h3>
<p>Hello {{ $driver->name() }} you have recived delivery request from {{ $delivery->customer->name() }} here are the details</p>
<p>Delivery Location: {{ $delivery->delivery_address }}</p>
<p>Customer Phone no:{{ $delivery->customer->contact_no }}</p>
<p>Assigned Vehicle:{{ $delivery->vehicle->name }}</p>

