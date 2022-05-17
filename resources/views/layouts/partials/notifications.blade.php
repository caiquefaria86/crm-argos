<li>
    <h6 class="dropdown-header">Notificações</h6>
</li>
@forelse ($notifications as $notif)

    @php $data = json_decode($notif->data); @endphp

    <a class="link-item btn-notifications" href="" id="{{$notif->id}}" data-id="{{$data->contact->id}}">
        <div class="link-item border-top border-bottom">
            <p class="title-notification">
                @if ($notif->type == "App\Notifications\CardTargetUser")
                    Você foi marcado em um Card
                @endif
            </p>
            {{-- Contato: Juvenir Alves dos santos, clique para acompanhar --}}
            <p class="content-notification text-justify">
                O contato "{{$data->contact->name}}" agora faz parte de seus cards, clique para ver.
            </p>
            <p class="time-notification text-right px-2 d-flex justify-content-end">{{dateFriendly($notif->created_at)}}</p>
        </div>
    </a>
@empty
<p class="title-notification text-justify">Não há notificações</p>
@endforelse
{{--
{
    "contact":
    {
        "id":5,
        "user_id":1,
        "status":1,
        "list":"budgetSent",
        "name":"Alessandro de Oliveira",
        "cellphone":"17988262545",
        "city":"Mirassol",
        "email":"caique@gmail.com",
        "origin":"facebook Ads",
        "responsible_id":1,
        "responsibleOffice":"Rio Preto",
        "created_at":"2022-04-12T00:27:23.000000Z",
        "updated_at":"2022-04-16T01:40:30.000000Z"
    }
}
 --}}
