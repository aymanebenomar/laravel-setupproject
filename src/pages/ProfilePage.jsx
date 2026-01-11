import { useState } from 'react'
import { Link } from 'react-router-dom'

export default function ProfilePage() {
  const [profile, setProfile] = useState({
    name: 'John Developer',
    email: 'john@example.com',
    bio: 'Passionate learner and full-stack developer. Currently learning React and TypeScript.',
    avatar: '👨‍💻',
    location: 'San Francisco, CA',
    currentStreak: 42,
    totalDays: 89,
    totalHours: 156,
  })

  const [isEditing, setIsEditing] = useState(false)
  const [editData, setEditData] = useState(profile)

  const handleSave = () => {
    setProfile(editData)
    setIsEditing(false)
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
          <Link to="/dashboard" className="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition">
            🎯 Learning Streak Tracker
          </Link>
          <nav className="hidden md:flex space-x-6">
            <Link to="/dashboard" className="text-gray-700 hover:text-indigo-600 font-medium transition">Dashboard</Link>
            <Link to="/goals" className="text-gray-700 hover:text-indigo-600 font-medium transition">Goals</Link>
            <Link to="/checkin" className="text-gray-700 hover:text-indigo-600 font-medium transition">Check-in</Link>
            <Link to="/profile" className="text-gray-700 hover:text-indigo-600 font-medium transition">Profile</Link>
          </nav>
          <button className="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
            Logout
          </button>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          {/* Profile Card */}
          <div className="lg:col-span-1">
            <div className="bg-white rounded-lg shadow-lg p-8 text-center sticky top-24">
              <div className="text-7xl mb-4">{profile.avatar}</div>
              {!isEditing ? (
                <>
                  <h1 className="text-3xl font-bold text-gray-900 mb-2">{profile.name}</h1>
                  <p className="text-gray-600 mb-1">{profile.email}</p>
                  <p className="text-gray-600 mb-6">📍 {profile.location}</p>
                  <button
                    onClick={() => setIsEditing(true)}
                    className="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition mb-4"
                  >
                    Edit Profile
                  </button>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                    Share Profile
                  </button>
                </>
              ) : (
                <>
                  <input
                    type="text"
                    value={editData.name}
                    onChange={(e) => setEditData({ ...editData, name: e.target.value })}
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                  <input
                    type="text"
                    value={editData.location}
                    onChange={(e) => setEditData({ ...editData, location: e.target.value })}
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                  <button
                    onClick={handleSave}
                    className="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition mb-2"
                  >
                    Save Changes
                  </button>
                  <button
                    onClick={() => setIsEditing(false)}
                    className="w-full bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg transition"
                  >
                    Cancel
                  </button>
                </>
              )}
            </div>
          </div>

          {/* Stats & Bio */}
          <div className="lg:col-span-2 space-y-8">
            {/* Bio Section */}
            <div className="bg-white rounded-lg shadow-md p-8">
              <h2 className="text-2xl font-bold text-gray-900 mb-4">About Me</h2>
              {!isEditing ? (
                <p className="text-gray-700 leading-relaxed">{profile.bio}</p>
              ) : (
                <textarea
                  value={editData.bio}
                  onChange={(e) => setEditData({ ...editData, bio: e.target.value })}
                  rows="4"
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                ></textarea>
              )}
            </div>

            {/* Stats Grid */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div className="bg-white rounded-lg shadow-md p-6 text-center">
                <div className="text-4xl font-bold text-indigo-600">{profile.currentStreak}</div>
                <p className="text-gray-600 mt-2">Current Streak 🔥</p>
              </div>
              <div className="bg-white rounded-lg shadow-md p-6 text-center">
                <div className="text-4xl font-bold text-green-600">{profile.totalDays}</div>
                <p className="text-gray-600 mt-2">Total Days 📅</p>
              </div>
              <div className="bg-white rounded-lg shadow-md p-6 text-center">
                <div className="text-4xl font-bold text-blue-600">{profile.totalHours}</div>
                <p className="text-gray-600 mt-2">Total Hours ⏱️</p>
              </div>
            </div>

            {/* Recent Activity */}
            <div className="bg-white rounded-lg shadow-md p-8">
              <h2 className="text-2xl font-bold text-gray-900 mb-6">Recent Activity</h2>
              <div className="space-y-4">
                <div className="flex items-center justify-between py-4 border-b">
                  <div>
                    <p className="font-semibold text-gray-900">Learned React Context API</p>
                    <p className="text-gray-600 text-sm">2 hours • 2024-11-21</p>
                  </div>
                  <span className="text-2xl">✨</span>
                </div>
                <div className="flex items-center justify-between py-4 border-b">
                  <div>
                    <p className="font-semibold text-gray-900">Completed TypeScript Basics</p>
                    <p className="text-gray-600 text-sm">1.5 hours • 2024-11-20</p>
                  </div>
                  <span className="text-2xl">🎯</span>
                </div>
                <div className="flex items-center justify-between py-4">
                  <div>
                    <p className="font-semibold text-gray-900">Built Todo App with React</p>
                    <p className="text-gray-600 text-sm">3 hours • 2024-11-19</p>
                  </div>
                  <span className="text-2xl">🚀</span>
                </div>
              </div>
            </div>

            {/* Badges Section */}
            <div className="bg-white rounded-lg shadow-md p-8">
              <h2 className="text-2xl font-bold text-gray-900 mb-6">Badges & Achievements</h2>
              <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div className="text-center p-4 bg-yellow-50 rounded-lg">
                  <div className="text-4xl mb-2">🔥</div>
                  <p className="text-sm font-semibold text-gray-900">7-Day Streak</p>
                </div>
                <div className="text-center p-4 bg-purple-50 rounded-lg">
                  <div className="text-4xl mb-2">⭐</div>
                  <p className="text-sm font-semibold text-gray-900">50 Hours</p>
                </div>
                <div className="text-center p-4 bg-blue-50 rounded-lg">
                  <div className="text-4xl mb-2">🏆</div>
                  <p className="text-sm font-semibold text-gray-900">Learner</p>
                </div>
                <div className="text-center p-4 bg-green-50 rounded-lg">
                  <div className="text-4xl mb-2">💪</div>
                  <p className="text-sm font-semibold text-gray-900">Consistent</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <footer className="bg-gray-900 text-white mt-16 py-8">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <p>&copy; 2024 Learning Streak Tracker. Built with React & Vite.</p>
        </div>
      </footer>
    </div>
  )
}
