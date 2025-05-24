import { Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { PantallaInicioComponent } from './pantalla-inicio/pantalla-inicio.component';
import { PantallaProductoComponent } from './pantalla-producto/pantalla-producto.component';
import { CategoriaProductosComponent } from './categoria-productos/categoria-productos.component';

export const routes: Routes = [
    { path: '', redirectTo: 'inicio', pathMatch: 'full' },
    { path: 'inicio', component: PantallaInicioComponent },
    { path: 'producto/:id', component: PantallaProductoComponent },
    { path: 'categoria/:id', component: CategoriaProductosComponent },
];
