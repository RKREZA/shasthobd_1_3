
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">


                                @inject('prisontoprison',   'App\Models\PrisonToPrison')
                                @inject('prisontohospital', 'App\Models\PrisonToHospital')
                                @inject('prisontobail',     'App\Models\PrisonToBail')
                                @php
                                    if (is_null($prisontoprison->first()) || is_null($prisontohospital->first()) || is_null($prisontobail->first())) {
                                        $prisontoprison_notifications   = [];
                                        $prisontohospital_notifications = [];
                                        $prisontobail_notifications     = [];
                                    }else{
                                        $prisontoprison_notifications   = $prisontoprison->first()->unreadNotifications;
                                        $prisontohospital_notifications = $prisontohospital->first()->unreadNotifications;
                                        $prisontobail_notifications     = $prisontobail->first()->unreadNotifications;
                                    }
                                    
                                @endphp


                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">{{count($prisontoprison_notifications)+count($prisontohospital_notifications)+count($prisontobail_notifications)}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">

                                    <li>
                                        <div class="message-center notifications position-relative">

                                            @foreach($prisontoprison_notifications as $notification)
                                            <a href="{{$notification->data['actionURL']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Prisoner To Prison Transfer</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{$notification->data['body']}}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date("jS M Y | H:i:a", strtotime($notification->created_at))}}</span>
                                                </div>
                                            </a>
                                            @endforeach



                                            @foreach($prisontohospital_notifications as $notification)
                                            <a href="{{$notification->data['actionURL']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-warning rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Prisoner To Hospital Transfer</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{$notification->data['body']}}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date("jS M Y | H:i:a", strtotime($notification->created_at))}}</span>
                                                </div>
                                            </a>
                                            @endforeach



                                            @foreach($prisontobail_notifications as $notification)
                                            <a href="{{$notification->data['actionURL']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-warning rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Prisoner To Hospital Transfer</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{$notification->data['body']}}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date("jS M Y | H:i:a", strtotime($notification->created_at))}}</span>
                                                </div>
                                            </a>
                                            @endforeach
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 pb-3 text-center text-dark" href="{{ route('notifications.index') }}" style="min-width: 210px">
                                            <strong>Check all notifications</strong>
                                            <i data-feather="arrow-right" class="feather-icon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>