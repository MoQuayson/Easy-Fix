import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import { SplitButton } from "primereact/splitbutton"

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

    //action templates
    const actionButtonTemplates=(data)=>{
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View issue" onClick={()=>{redirectToShowUrl(data.issue_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit issue" onClick={()=>{redirectToEditUrl(data.issue_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete issue"/>

               {
                    canProvideSolution ?
                    <Button id='solutionBtn'  className="p-button-raised p-button-rounded p-button-secondary"
                    icon="bi bi-list-task" tooltip="provide solution" onClick={()=>{redirectToSolutionUrl(data.issue_id)}} />: null
               }
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow">
                <DataTable value={issues} size="small"  stripedRows responsiveLayout="scroll">
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
