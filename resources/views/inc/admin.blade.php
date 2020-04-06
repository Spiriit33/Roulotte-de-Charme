<div class="card">
    <div class="card-body">
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('administration')}}">Home</a> </p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('configuration')}}">Configuration</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('manage_roulotte')}}">Gérer la roulotte</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('manage_reservations')}}">Gérer les reservations</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('manage_activités')}}">Gérer les activités</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('manage_site')}}">Gérer les sites touristiques</a></p>
        @php
        $contact = \App\Contact::awaitingAnswer();
        @endphp
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="{{route('manage_contacts')}}">Gérer les contacts</a> ({{$contact}})</p>
    </div>
</div>
