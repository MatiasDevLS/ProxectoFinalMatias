import { Component, OnInit } from '@angular/core';
import { ProductosService } from './services/ProductoService/productos.service';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  imports: [
    CommonModule,
    HttpClientModule,
    RouterOutlet
  ]
})
export class AppComponent implements OnInit {
  title = 'client';
  datos: any;

  constructor(public productosService: ProductosService) {}

  ngOnInit(): void {
    this.productosService.getProductos().subscribe({
      next: (respond: any) => this.datos = respond
    });
  }
}