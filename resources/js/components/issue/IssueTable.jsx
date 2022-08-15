import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import axios from 'axios';

export default function IssueTable(){
    const [issues,setIssues]=useState([])
    const [canProvideSolution,setCanProvideSolution] = useState(false);

    useEffect(()=>{
        async function fetchIssues(){
            const response = await fetch('/api/issues');
            const fetchedIssues = await response.json(response);
            const fetchedPermission = fetchedIssues['can_provide_solution'];
            setIssues(fetchedIssues['issues']);
            setCanProvideSolution(fetchedPermission);
        }

        fetchIssues();

    },[]);

    const deleteConfirm = (issue_id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            acceptClassName: 'p-button-danger',
            accept:()=>{
                deleteUrl(issue_id)
            },
        });
    };


    const redirectToEditUrl = (issue_id)=>{
        window.location.href = "/issues/"+issue_id+"/edit"
    }

    const redirectToShowUrl = (issue_id)=>{
        window.location.href = "/issues/"+issue_id
    }

    const redirectToSolutionUrl=(issue_id)=>{
        //Get /issues/{issue_id}/solution/create
        window.location.href = "/issues/"+issue_id+"/solution/create";
    }

    const deleteUrl=(issue_id)=>{
        var url =  '/issues/' + issue_id;
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

    //action templates
    const actionButtonTemplates=(data)=>{
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View issue" onClick={()=>{redirectToShowUrl(data.issue_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit issue" onClick={()=>{redirectToEditUrl(data.issue_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete issue" onClick={()=>{deleteConfirm(data.issue_id)}}/>
               {
                    canProvideSolution ?
                    <Button id='solutionBtn'  className="p-button-raised p-button-rounded p-button-secondary"
                    icon="bi bi-lightbulb" tooltip="provide solution" onClick={()=>{redirectToSolutionUrl(data.issue_id)}} />: null
               }
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow">
            <ConfirmDialog />
                <DataTable value={issues} size="small"  stripedRows responsiveLayout="scroll" paginator
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}>
                    <Column field="name" header="Full Name" sortable></Column>
                    <Column field="email" header="Email" sortable></Column>
                    <Column field="telephone" header="Telephone" sortable></Column>
                    <Column field="gadget_name" header="Gadget Name" sortable></Column>
                    <Column field="gadget_type" header="Gadget Type" sortable></Column>
                    <Column field="description" header="Description" sortable></Column>
                    <Column field="location" header="Location" sortable></Column>
                    <Column field='Actions' header="Actions" body={actionButtonTemplates}></Column>
                </DataTable>
            </div>
        </div>
    );
}
