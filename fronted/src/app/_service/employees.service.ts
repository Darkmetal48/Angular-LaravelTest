/*import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EmployeesService {

  constructor() { }
}*/
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from './api.service';

//var apiUrl = "https://localhost:44370/";

var apiUrl = "http://localhost:8000";

var httpLink = {
  getAllEmployee: apiUrl + "/api/employee/",
  deleteEmployeeById: apiUrl + "/api/employee/delete",
  getEmployeeDetailById: apiUrl + "/api/employee/getEmployeeDetailById",
  saveEmployee: apiUrl + "/api/employee/saveEmployee"
}

@Injectable({
  providedIn: 'root'
})
export class HttpProviderService {

  constructor(private ApiService: ApiService) { }

  public getAllEmployee(): Observable<any> {
    return this.ApiService.get(httpLink.getAllEmployee);
  }

  public deleteEmployeeById(model: any): Observable<any> {
    return this.ApiService.post(httpLink.deleteEmployeeById + '?employeeId=' + model, "");
  }

  public getEmployeeDetailById(model: any): Observable<any> {
    return this.ApiService.get(httpLink.getEmployeeDetailById + '?employeeId=' + model);
  }

  public saveEmployee(model: any): Observable<any> {
    return this.ApiService.post(httpLink.saveEmployee, model);
  }
  
}