import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TiposService {

    constructor(public http:HttpClient) { }

  public getTipos(){
    return this.http.get('http://127.0.0.1:8000/exportarTodoTipo')
  }

  public getTipo(id:string){
    return this.http.get('http://127.0.0.1:8000/exportarTipo/'+id)
  }
}
