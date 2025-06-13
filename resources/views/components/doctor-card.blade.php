<div class="col-md-12 mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center symptomes border border-primary-me p-3 px-4 rounded">
        <div class="informations">
            <img src="{{ asset('images/person.svg') }}" alt="Photo du docteur" class="profil_photo rounded-circle p-2 bg-gray-me mb-2" width="80">
            <h3 class="text-black">{{ $name }}</h3>
            <p class="fst-italic">{{ $specialty }}</p>
        </div>
        
        <div class="row information_price">
            <div class="col-12">
                <p class="mb-1">Tarif</p>
                <h2>{{ $price }}</h2>
            </div>
            <div class="col-12">
                <p class="mb-1">Ville</p>
                <h2>{{ $city }}</h2>
            </div>
        </div>
        
        <!-- Disponibilités -->
        @foreach($availabilities as $availability)
            <div class="row d-flex justify-content-around align-item-center">
                <div class="col day">
                    <h5 class="text-primary-me text-bold">{{ $availability['day'] }}</h5>
                </div>
                @foreach($availability['hours'] as $hour)
                    <div class="col hours">
                        <p class="bg-primary-me py-1 px-2 cursor text-bold">{{ $hour }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
        
        <button class="btn btn-primary rounded-pill w-100">Voir agenda</button>
    </div>
</div>