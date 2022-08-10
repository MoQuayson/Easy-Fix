import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import { SplitButton } from "primereact/splitbutton"

export default function SolutionTable(){
    const [solutions,setSolutions]=useState([])

    useEffect(()=>{
        async function fetchSolutions(){
            const response = await fetch('/api/solutions');
            const fetchedSolutions = await response.json(response);
            setSolutions(fetchedSolutions);
        }

        fetchSolutions();

    },[]);

    const redirectToEditUrl = (issue_id,solution_id)=>{
        //Get /issues/{issue_id}/solution/{solution_id}/edit
        window.location.href = "/issues/"+issue_id+"/solution/"+solution_id+"/edit"
    }

    const redirectToShowUrl = (issue_id,solution_id)=>{
        //Get /issues/{issue_id}/solution/{solution_id}/
        window.location.href = "/issues/"+issue_id+"/solution/"+solution_id
    }

    //action templates
    const actionButtonTemplates=(data)=>{
        let solution_id = data.solution_id;
        let issue_id = data.issue_id;
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View solution" onClick={()=>{redirectToShowUrl(issue_id,solution_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit solution" onClick={()=>{redirectToEditUrl(issue_id,solution_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete solution" />
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow">
                <DataTable value={solutions} size="small"  stripedRows responsiveLayout="scroll">
                    <Column field="fullname" header="Full Name" sortable style={{'minWidth':'15%'}}></Column>
                    <Column field="issue_description" header="Issue" sortable style={{'minWidth':'20%'}}></Column>
                    <Column field="solution_description" header="Solution" sortable style={{'minWidth':'50%'}}></Column>
                    <Column field='Actions' header="Actions" body={actionButtonTemplates} style={{'width':'15%'}}></Column>
                </DataTable>
            </div>
        </div>
    );
}
