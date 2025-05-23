import { Component, OnInit } from '@angular/core';
import { TiposService } from '../services/TiposService/tipos.service';

@Component({
  selector: 'app-barra-menu',
  imports: [],
  templateUrl: './barra-menu.component.html',
  styleUrl: './barra-menu.component.scss'
})
export class BarraMenuComponent implements OnInit {
  tipos!:any[]
  constructor(public tiposService:TiposService){

  }
  ngOnInit(): void {
    this.tiposService.getTipos().subscribe({
      next: (result:any) => {
        this.tipos=result
      }
    })
  }
}
