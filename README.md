# 🚀 Sistema Gestione Campagne e Domini

Questo modulo gestisce l'autorizzazione dei domini esterni e la segmentazione dei lead tramite tag CRM. È il cuore pulsante per chi utilizza l'embed form su siti di terze parti (es. siti di clienti o landing page esterne).

## 📌 Funzionalità Principali
- **Whitelist di sicurezza**: Solo i domini registrati e in stato `active` possono processare i lead.
- **Tagging dinamico**: Ogni campagna assegna automaticamente un tag specifico nel CRM (es: `Campagna-Export`).
- **Gestione Compliance**: Centralizzazione dei link Privacy Policy e Termini per ogni specifico dominio autorizzato.

## 🗄️ Database Schema (`campaigns`)
| Campo | Tipo | Descrizione |
| :--- | :--- | :--- |
| `name` | String | Nome del cliente o della promozione. |
| `authorized_domain` | String | Host autorizzato (es: `sito-cliente.it`). |
| `tag` | String | Etichetta assegnata al contatto nel CRM. |
| `privacy_policy_url` | URL | Link legale obbligatorio per l'invio. |
| `status` | Enum | `active` o `inactive`. |

## 🛠️ Componenti del Modulo

### 1. Model (`App\Models\Campaign`)
Gestisce il **Mass Assignment** tramite la proprietà `$fillable`. Non ci sono relazioni complesse, rendendo il modulo leggero e veloce.

### 2. Controller (`Admin\CampaignController`)
Gestisce il flusso CRUD:
- **Validazione:** Controllo rigoroso sugli URL e unicità del dominio (eccetto in fase di update per lo stesso ID).
- **Sicurezza:** Solo gli utenti autenticati con accesso Admin possono gestire i record.

### 3. Viste Blade
- `index.blade.php`: Tabella riassuntiva con indicatori di stato dinamici (badge).
- `create.blade.php`: Form ottimizzato con feedback di errore in tempo reale e valori di default (es: `Web Lead`).

## ⚙️ Configurazione Rotte
Per abilitare il modulo, aggiungere nel file `routes/web.php`:
```php
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('campaigns', CampaignController::class);
});
