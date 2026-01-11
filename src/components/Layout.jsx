import { Link, useNavigate } from 'react-router-dom'

export default function Layout({ children }) {
  const navigate = useNavigate()

  const handleLogout = () => {
    navigate('/')
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex flex-col">
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
          <Link to="/dashboard" className="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition">
            🎯 Learning Streak Tracker
          </Link>
          <nav className="hidden md:flex space-x-6">
            <Link to="/dashboard" className="text-gray-700 hover:text-indigo-600 font-medium transition">
              Dashboard
            </Link>
            <Link to="/goals" className="text-gray-700 hover:text-indigo-600 font-medium transition">
              Goals
            </Link>
            <Link to="/checkin" className="text-gray-700 hover:text-indigo-600 font-medium transition">
              Check-in
            </Link>
            <Link to="/profile" className="text-gray-700 hover:text-indigo-600 font-medium transition">
              Profile
            </Link>
          </nav>
          <button
            onClick={handleLogout}
            className="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition"
          >
            Logout
          </button>
        </div>
      </header>

      <main className="flex-1">
        {children}
      </main>

      <footer className="bg-gray-900 text-white py-8 mt-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <p>&copy; 2024 Learning Streak Tracker. Built with React & Vite.</p>
        </div>
      </footer>
    </div>
  )
}
