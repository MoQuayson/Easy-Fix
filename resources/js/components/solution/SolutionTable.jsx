import { useEffect, useState } from 'react';
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import { Button } from 'primereact/button';
import { Tooltip } from 'primereact/tooltip';
import axios from 'axios'
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';

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

    const deleteConfirm = (solution_id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            acceptClassName: 'p-button-danger',
            accept:()=>{
                deleteUrl(solution_id)
            },
        });
    };

    const deleteUrl=(solution_id)=>{
        var url =  '/solutions/' + solution_id;
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
        let solution_id = data.solution_id;
        let issue_id = data.issue_id;
        return (
           <div className="row">
                <Button id='viewBtn'  className="p-button-raised p-button-rounded p-button-primary"
                icon="pi pi-eye" tooltip="View solution" onClick={()=>{redirectToShowUrl(issue_id,solution_id)}}/>
                <Button id='editBtn' className="p-button-raised p-button-rounded p-button-success"
                icon="bi bi-pencil-square" tooltip="Edit solution" onClick={()=>{redirectToEditUrl(issue_id,solution_id)}}/>
                <Button id='deleteBtn'  className="p-button-raised p-button-rounded p-button-danger"
                icon="pi pi-trash" tooltip="Delete solution" onClick={()=>{deleteConfirm(solution_id)}} />
           </div>
        )
    }

    //display table
    return (
        <div className='container'>
            <div className="card shadow">
                <ConfirmDialog/>
                <DataTable value={solutions} size="small"  stripedRows responsiveLayout="scroll" paginator
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}>
                    <Column field="fullname" header="Full Name" sortable style={{'minWidth':'15%'}}></Column>
                    <Column field="issue_description" header="Issue" sortable style={{'minWidth':'20%'}}></Column>
                    <Column field="solution_description" header="Solution" sortable style={{'minWidth':'50%'}}></Column>
                    <Column field='Actions' header="Actions" body={actionButtonTemplates} style={{'width':'15%'}}></Column>
                </DataTable>
            </div>
        </div>
    );
}
