import { Component, OnInit } from '@angular/core';
import { ProductosService } from './services/ProductoService/productos.service';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { RouterOutlet } from '@angular/router';
import { NavComponent } from "./nav/nav.component";

@Component({
  selector: 'app-root',
  standalone: true,
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  imports: [
    CommonModule,
    HttpClientModule,
    RouterOutlet,
    NavComponent
]
})
export class AppComponent  {

  


}