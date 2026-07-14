<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Create Bill of Materials"
            subtitle="Create product BOM"
        />
    </x-slot>

    <form method="POST" action="{{ route('boms.store') }}">
        @csrf

        @include('bom._header')

        <div class="mt-6">
            @include('bom._materials')
        </div>

        <div class="mt-6">
            @include('bom._processes')
        </div>

        <div class="mt-8 flex gap-3">

            <x-primary-button>
                Save BOM
            </x-primary-button>

            <a
                href="{{ route('boms.index') }}"
                class="px-4 py-2 rounded-lg border">

                Cancel

            </a>

        </div>

    </form>

    <script>

    // ===========================
    // MATERIAL
    // ===========================

    let materialIndex = 1;

    document.getElementById('btn-add-material').addEventListener('click', function () {

        const tbody = document.getElementById('materials-body');

        const row = tbody.rows[0].cloneNode(true);

        row.querySelectorAll('select,input').forEach(function(el){

            if(el.name){

                el.name = el.name.replace('[0]', '[' + materialIndex + ']');

            }

            if(el.tagName === 'SELECT'){

                el.selectedIndex = 0;

            }

            if(el.tagName === 'INPUT'){

                if(el.type === 'text'){

                    el.value = '';

                }

                if(el.type === 'number'){

                    if(el.name.includes('yield_percent')){

                        el.value = 100;

                    }else{

                        el.value = 1;

                    }

                }

            }

        });

        tbody.appendChild(row);

        materialIndex++;

    });

    document.addEventListener('click', function(e){

        if(e.target.classList.contains('btn-delete-material')){

            const rows = document.querySelectorAll('#materials-body tr');

            if(rows.length > 1){

                e.target.closest('tr').remove();

            }

        }

    });

    // ===========================
    // PROCESS
    // ===========================

    let processIndex = 1;

    document.getElementById('btn-add-process').addEventListener('click', function(){

        const tbody = document.getElementById('processes-body');

        const row = tbody.rows[0].cloneNode(true);

        row.querySelectorAll('select,input').forEach(function(el){

            if(el.name){

                el.name = el.name.replace('[0]', '[' + processIndex + ']');

            }

            if(el.tagName === 'SELECT'){

                el.selectedIndex = 0;

            }

            if(el.tagName === 'INPUT'){

                el.value = '';

            }

        });

        tbody.appendChild(row);

        processIndex++;

    });

    document.addEventListener('click', function(e){

        if(e.target.classList.contains('btn-delete-process')){

            const rows = document.querySelectorAll('#processes-body tr');

            if(rows.length > 1){

                e.target.closest('tr').remove();

            }

        }

    });

    </script>

</x-app-layout>