<x-app>

    <x-slot name="body_class">
        hold-transition sidebar-mini sidebar-collapse layout-fixed
    </x-slot>

    <x-slot name="page_title">
        dashboard
    </x-slot>

    <x-slot name="css">
        {{-- Custom CSS file here --}}
    </x-slot>

    <x-slot name="content">
        <div class="wrapper">

            {{-- Navbar --}}
            <x-navbar>
    
            </x-navbar>
    
            {{-- Sidebar --}}
            <x-sidebar>
                <x-slot name="correo">
                    {{ $user->correo }}
                </x-slot>
                <x-slot name="nombreUsuario">
                    {{ $user->nombre }}
                </x-slot>
            </x-sidebar>
    
            {{-- Content Wrapper. Contains page content --}}
            <div class="content-wrapper">
    
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Título de la página</h1>
                            </div>
                            <div class="col-sm-6 text-end">
                                
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Encabezado
                                    </div>
                                    <div class="card-body">
                                        Cuerpo de la tarjeta
                                    </div>
                                    <div class="card-footer">
                                        pie de la tarjeta   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    
            </div>
    
            {{-- Footer --}}
            <x-footer>
            </x-footer>
    
        </div>

    </x-slot>
</x-app>