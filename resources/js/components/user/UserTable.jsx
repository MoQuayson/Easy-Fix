import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import axios  from "axios"
import { ConfirmDialog } from 'primereact/confirmdialog';

export default function UserTable(){
    const [users,setUsers]=useState([])
    const [userID,setUserID]= useState('')

    useEffect(()=>{
        async function fetchUsers(){
            const response = await fetch('/api/users');
            const fetchedUsers = await response.json(response);
            setUsers(fetchedUsers);
        }

        fetchUsers();

    },[]);

    const redirectToEditUrl = (user_id)=>{
        window.location.href = "/users/"+user_id+"/edit"
    }

    const redirectToShowUrl = (user_id)=>{
        window.location.href = "/users/"+user_id
    }

    //action templates
    const actionButtonTemplates=(data)=>{
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View user information" onClick={()=>{redirectToShowUrl(data.user_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit user information" onClick={()=>{redirectToEditUrl(data.user_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete user information" onClick={()=>{deleteConfirm(data.user_id)}} />
           </div>
        )
    }

    const deleteConfirm = (user_id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            acceptClassName: 'p-button-danger',
            accept:()=>{
                deleteUrl(user_id)
            },
        });
    };

    const deleteUrl=(user_id)=>{
        var url =  '/users/' + user_id;
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

    return (
        <div className='container'>
            <div className="card shadow">
                <ConfirmDialog/>
                <DataTable value={users} size="small"  stripedRows responsiveLayout="scroll" paginator
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}>
                    <Column field="fullname" header="Full Name" rowReorderIcon sortable style={{'width':'30%'}} ></Column>
                    <Column field="email" header="Email" sortable></Column>
                    <Column field="telephone" header="Telephone" sortable></Column>
                    <Column field="role" header="Role" sortable></Column>
                    <Column field='Actions' header="Actions" body={actionButtonTemplates} style={{'width':'10%'}}></Column>
                </DataTable>
            </div>
        </div>
    );
}
