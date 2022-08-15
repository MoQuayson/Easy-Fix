import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import axios from 'axios';

export default function PermissionTable(){
    const [permissions,setPermissions]=useState([])

    useEffect(()=>{
        async function fetchPermissions(){
            const response = await fetch('/api/permissions');
            const fetchedPermissions = await response.json(response);
            setPermissions(fetchedPermissions);
        }

        fetchPermissions();

    },[]);

    const deleteConfirm = (permission_id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            acceptClassName: 'p-button-danger',
            accept:()=>{
                deleteUrl(permission_id)
            },
        });
    };

    const deleteUrl=(permission_id)=>{
        var url =  '/permissions/' + permission_id;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios({
                method: "delete",
                url: url,
                responseType:JSON,
                headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                }
            })
            .then((response) =>{
                //console.log(response);
                window.location.reload();
            })
            .catch(function (error) {
                console.log(error);
        });
    }

    const redirectToEditUrl = (permission_id)=>{
        //Get /permission/{id}/edit
        window.location.href = 'permissions/'+permission_id+'/edit'
    }

    const redirectToShowUrl = (permission_id)=>{
        //Get /permission/{id}
        window.location.href =  'permissions/'+permission_id
    }

    //action templates
    const actionButtonTemplates=(data)=>{
        let permission_id = data.id;
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View permission" onClick={()=>{redirectToShowUrl(permission_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit permission" onClick={()=>{redirectToEditUrl(permission_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete permission" onClick={()=>{deleteConfirm(permission_id)}} />
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow mb-4">
                <ConfirmDialog/>
                <DataTable value={permissions} size="small"  stripedRows paginator responsiveLayout="scroll"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}>
                    <Column field="name" header="Name" sortable></Column>
                    <Column field='Actions' header='Actions' body={actionButtonTemplates} style={{'width':'10%'}}></Column>
                </DataTable>
            </div>
        </div>
    );
}
