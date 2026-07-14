@push('scripts')

<script>

//
// =========================
// MATERIAL
// =========================
//

let materialIndex = document.querySelectorAll('#materials-body tr').length;

const btnAddMaterial = document.getElementById('btn-add-material');

if(btnAddMaterial){

    btnAddMaterial.addEventListener('click', function () {

        const tbody = document.getElementById('materials-body');

        const row = tbody.rows[0].cloneNode(true);

        row.querySelectorAll('select,input').forEach(function(el){

            if(el.name){

                el.name = el.name.replace(/\[\d+\]/, '[' + materialIndex + ']');

            }

            if(el.tagName === 'INPUT'){

                if(el.type === 'text'){

                    el.value='';

                }

                if(el.type === 'number'){

                    if(el.name.includes('yield_percent')){

                        el.value=100;

                    }else{

                        el.value=1;

                    }

                }

            }

            if(el.tagName==='SELECT'){

                el.selectedIndex=0;

            }

        });

        tbody.appendChild(row);

        materialIndex++;

    });

}

document.addEventListener('click',function(e){

    if(e.target.classList.contains('btn-delete-material')){

        const rows=document.querySelectorAll('#materials-body tr');

        if(rows.length>1){

            e.target.closest('tr').remove();

        }

    }

});

//
// =========================
// PROCESS
// =========================
//

let processIndex = document.querySelectorAll('#processes-body tr').length;

const btnAddProcess = document.getElementById('btn-add-process');

if(btnAddProcess){

    btnAddProcess.addEventListener('click', function () {

        const tbody = document.getElementById('processes-body');

        const row = tbody.rows[0].cloneNode(true);

        row.querySelectorAll('select,input').forEach(function(el){

            if(el.name){

                el.name = el.name.replace(/\[\d+\]/, '[' + processIndex + ']');

            }

            if(el.tagName==='INPUT'){

                el.value='';

            }

            if(el.tagName==='SELECT'){

                el.selectedIndex=0;

            }

        });

        tbody.appendChild(row);

        processIndex++;

    });

}

document.addEventListener('click',function(e){

    if(e.target.classList.contains('btn-delete-process')){

        const rows=document.querySelectorAll('#processes-body tr');

        if(rows.length>1){

            e.target.closest('tr').remove();

        }

    }

});

</script>

@endpush