import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';

export default function UserTable(){
    const [users,setUsers]=useState([])

    const redirectToEditUrl = ()=>{
        window.location.href = "/users/"+user_id+"/edit"
    }
    useEffect(()=>{
        async function fetchUsers(){
            const response = await fetch('/api/users');
            const fetchedUsers = await response.json(response);
            setUsers(fetchedUsers);
        }

        fetchUsers();

    },[]);

    const actionButtonTemplates=()=>{
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View user information" />
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit user information" onClick={redirectToEditUrl}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete user information" />
           </div>
        )
    }



    return (
        <div>
            {console.log(users[0])}
            <div className="card shadow">
                <DataTable value={users} size="small"  stripedRows responsiveLayout="scroll">
                    <Column field="user_id" header="Full Name" rowReorderIcon sortable></Column>
                    <Column field="email" header="Email" sortable></Column>
                    <Column field="telephone" header="Telephone" sortable></Column>
                    <Column field="role" header="Role" sortable></Column>
                    <Column header="Actions" body={actionButtonTemplates()}></Column>
                </DataTable>
            </div>
        </div>
    );
}
