import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import { SplitButton } from "primereact/splitbutton"

export default function RoleTable(){
    const [roles,setRoles]=useState([])

    useEffect(()=>{
        async function fetchRoles(){
            const response = await fetch('/api/roles');
            const fetchedRoles = await response.json(response);
            setRoles(fetchedRoles);
        }

        fetchRoles();

    },[]);

    const redirectToEditUrl = (role_id)=>{
        //Get /role/{id}/edit
        window.location.href = 'roles/'+role_id+'/edit'
    }

    const redirectToShowUrl = (role_id)=>{
        //Get /role/{id}
        window.location.href =  'roles/'+role_id
    }

    //action templates
    const actionButtonTemplates=(data)=>{
        let role_id = data.id;
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View role" onClick={()=>{redirectToShowUrl(role_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit role" onClick={()=>{redirectToEditUrl(role_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete role" />
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow">
                <DataTable value={roles} size="small"  stripedRows responsiveLayout="scroll" paginator
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}>
                    <Column field="name" header="Name" sortable></Column>
                    <Column field='Actions' header='Actions' body={actionButtonTemplates} style={{'width':'10%'}}></Column>
                </DataTable>
            </div>
        </div>
    );
}
